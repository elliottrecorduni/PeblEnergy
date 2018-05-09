import curses
import threading

import npyscreen
import DeviceData

console_data = DeviceData.data
console_list = []


class App(npyscreen.StandardApp):
    def onStart(self):
        self.addForm("MAIN", MainForm, name="Control Panel")


class InputBox(npyscreen.BoxTitle):
    _contained_widget = npyscreen.Pager

class MainForm(npyscreen.FormWithMenus):
    def create(self):
        global console_data
        global console_list

        y, x = self.useable_space()

        new_handlers = {
            # Set ctrl+Q to exit
            "^Q": self.exit_func,
        }
        self.add_handlers(new_handlers)
        self.InputBox = self.add(InputBox, name="Console", values=console_list)

        self.m1 = self.add_menu(name="Menu", shortcut="^M")
        self.m1.addItemsFromList([
            ("Device Info", self.whenDisplayText, None, None, ("Device MAC: " + str(DeviceData.s) + "\nDevice Name: " + DeviceData.device_name,)),
            ("Change Settings", ""),
            ("Exit Control Panel", self.exit_application, ""),
        ])

        self.update_console()

    def exit_func(self, _input):
        exit(0)

    def update_console(self):
        global console_data
        threading.Timer(DeviceData.interval, self.update_console).start()
        console_data = DeviceData.data
        console_list.append(console_data)

    def whenDisplayText(self, argument):
        npyscreen.notify_confirm(argument)

    def exit_application(self):
        curses.beep()
        self.parentApp.setNextForm(None)
        self.editing = False
        self.parentApp.switchFormNow()


class DeviceInfo(npyscreen.Form):
    def create(self):
        y, x = self.useable_space()


MyApp = App()
MyApp.run()

