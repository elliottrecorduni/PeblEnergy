<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceCategory;
use App\EnergyUsage;
use App\ScanDevice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DeviceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all()->where('is_legacy', '=', false);

        $deviceCategories = DeviceCategory::orderBy('name')->get();


        return view('devices.index', compact('devices', 'deviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device();

        $device->name = $request->name;
        $device->category_id = $request->category_id;
        $device->mac_address = $request->mac_address;
        $device->api_token = $request->api_token;

        $device->save();

        return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);

        $deviceCategories = DeviceCategory::orderBy('name')->get();

        return view('devices.edit', compact('device', 'deviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = Device::find($id);

        $device->name = $request->name;
        $device->category_id = $request->category_id;
        $device->mac_address = $request->mac_address;
        $device->api_token = $request->api_token;

        $device->save();

        return redirect()->route('devices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->is_legacy = true;
        $device->save();

        return redirect()->route('devices.index');
    }

    public function submit(Request $request){
        $device = Device::where('mac_address', $request->mac_address)->first();

        if (! is_null($device)){
            if ($request->api_token == $device->api_token){

                $energy_usage = new EnergyUsage();

                $energy_usage->device_id = $device->id;
                $energy_usage->start_time = $request->start_time;
                $energy_usage->end_time = $request->end_time;
                $energy_usage->kw_usage = $request->kw_usage;

                $energy_usage->save();
            }else{
                return Response::json(array(
                    'error' => true,
                    'msg' => 'Incorrect API key'
                ), 401);
            }
        }else{
            return Response::json(array(
                'error' => true,
                'msg' => 'Device not found'
            ), 404);
        }
    }

    public function scan(Request $request){

        //  Delete all data 5 minutes old.
        $allData = ScanDevice::all();
        $allData->each(function ($device){
            $created_at = Carbon::parse($device->created_at);
            if ($created_at < Carbon::now()->subMinute(1) ){
                $device->delete();
            }
        });


        $device = Device::where('mac_address', $request->mac_address)->first();
        if($device){
            return Response::json(array(
                'error' => true,
                'msg' => 'Device already exists',
                'api_token' => $device->api_token
            ), 201);
        }

        //    Attempt to find device in the history.
        $oldData = ScanDevice::where('mac_address', $request->mac_address)->first();

//    If the device doesn't exist, add a new row for it.
        if (is_null($oldData)){
            $scan_device = new ScanDevice();
            $scan_device->name = $request->name;
            $scan_device->mac_address = $request->mac_address;

            $scan_device->save();
        }

    }

    public function viewScan(){
        $allScans = ScanDevice::all();
        return view('pages.scan', compact('allScans'));
    }

    public function pair(Request $request){
        $oldInfo = Device::where('mac_address', $request->mac_address)->first();

        if (is_null($oldInfo)){
            $device = new Device();
            $device->name = $request->name;
            $device->category_id = 1;
            $device->mac_address = $request->mac_address;
            $device->api_token = str_random(10);
            $device->save();

            $scanDevice = ScanDevice::where('mac_address', $request->mac_address)->first();
            $scanDevice->delete();
        }

        return redirect()->route('devices.index');
    }
}
