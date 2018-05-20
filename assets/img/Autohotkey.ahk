/*

1. Hide Desktop Icon:		ALT + Q
2. Hide Gadgets:			ALT + W
3. Move up a folder in Explorer:	~ || MIDDLE MOUSE
4. Always on Top:			CTRL + SPACE
5. Suspend AutoHotKey:		WIN + SCROLL-LOCK || WIN + PAUSE 
6. Hide Taskbar:			ALT + R
7. Show Desktop:			ALT + E
8. Copyright C:			CTRL + ALT + SHIFT + C
9. Show/Hide Folder:		WIN + H
10. Minimize && Tray:		ALT + T	
11. Lock Computer:		CTRL + WIN + Z
12. Reload Script:		CTRL + ALT + SHIFT + R
13. Exit Script:		CTRL + ALT + SHIFT + E
14. Button 4 - MOUSE:	WIN + LEFT-MOUSE
15. Button 5 - MOUSE:	WIN + RIGHT-MOUSE

*/

; [ ==== Set Default Something === ]
Suspend, On

; [ ==== Hide Desktop Icon === ]
!q::

ControlGet, HWND, Hwnd,, SysListView321, ahk_class Progman
If HWND =
ControlGet, HWND, Hwnd,, SysListView321, ahk_class WorkerW
If DllCall("IsWindowVisible", UInt, HWND)
WinHide, ahk_id %HWND%
Else
WinShow, ahk_id %HWND%

Return

; [ ==== Hide Gadgets === ]
!w::
  run % ( st:=!st ) ? a_programFiles "\windows sidebar\sidebar.exe " : ""
  process, close, % ( !st ? "sidebar.exe" : "" )
return

; [ ==== Press middle mouse button to move up a folder in Explorer === ]
#IfWinActive, ahk_class CabinetWClass
~MButton::Send !{Up} 
#IfWinActive
return

; [ ==== Press ~ to move up a folder in Explorer === ]
#IfWinActive, ahk_class CabinetWClass
`::Send !{Up} 
#IfWinActive
return

; [ ==== Always on Top === ]
^SPACE:: Winset, Alwaysontop, , A ; ctrl + space
Return

; [ ==== Suspend AutoHotKey 3600000=== ]
#MaxThreadsPerHotkey 20
#ScrollLock::
	Suspend
	if (A_IsSuspended)
	{	
		MsgBox, ,Suspen, Hotkeys have been suspended, 2
	}
	else
	{
		Sleep, 3600000	
		Suspend, On
	}
return

; [ ==== Suspend AutoHotKey === ]
#Pause::Suspend

/*
; [ ==== Open Content === ]
^+c::Run "D:\Content"
return

; [ ==== Open QTT === ]
^+q::Run "C:\Users\ThanhLuan\Desktop\QTT"
return

; [ ==== Open Facebook && Share Video === ]
^+f::Run "E:\Facebook"
return

; [ ==== Open Google Drive === ]
^+g::Run "C:\Users\ThanhLuan\Google Drive"
return
*/

; [ ==== Hide Taskbar === ]
!r::
VarSetCapacity(APPBARDATA, A_PtrSize=4 ? 36:48)

   NumPut(DllCall("Shell32\SHAppBarMessage", "UInt", 4 ; ABM_GETSTATE
                                           , "Ptr", &APPBARDATA
                                           , "Int")
 ? 2:1, APPBARDATA, A_PtrSize=4 ? 32:40) ; 2 - ABS_ALWAYSONTOP, 1 - ABS_AUTOHIDE
 , DllCall("Shell32\SHAppBarMessage", "UInt", 10 ; ABM_SETSTATE
                                    , "Ptr", &APPBARDATA)
   KeyWait, % A_ThisHotkey
   Return

; [ ==== Show Desktop === ]
!e::
KeyWait,ScrollLock
Send,{LWin Down}{SC020}{LWin Up}
Return

; [ ==== Copyright C === ]
^!+c::
{
SendInput {©}
}
return

; [ ==== Show/Hide Folder === ]
#h:: 
RegRead, HiddenFiles_Status, HKEY_CURRENT_USER, Software\Microsoft\Windows\CurrentVersion\Explorer\Advanced, Hidden 
If HiddenFiles_Status = 2  
RegWrite, REG_DWORD, HKEY_CURRENT_USER, Software\Microsoft\Windows\CurrentVersion\Explorer\Advanced, Hidden, 1 
Else  
RegWrite, REG_DWORD, HKEY_CURRENT_USER, Software\Microsoft\Windows\CurrentVersion\Explorer\Advanced, Hidden, 2 
WinGetClass, eh_Class,A 
If (eh_Class = "#32770" OR A_OSVersion = "WIN_VISTA") 
Send, {F5} 
Else PostMessage, 0x111, 28931,,, A 
Send, {F5} 
Return

; [ ==== Minimize && Tray === ]
!t::
#NoEnv
#NoTrayIcon
IfWinActive, Program Manager
{
WinMinimizeAllUndo
}
Else
{
WinMinimizeAll
WinActivate, Program Manager
}
return

; [ ==== Auto Type === ]
^+!a::
SetKeyDelay -1
Send  ☞☞{enter}{enter}
Send  ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬{enter}
Send  ❂◡❂ Don't forget if you're away from Facebook you can follow us on{enter}
Send  ► Youtube: https://goo.gl/Bvf9Hb{enter}
Send  ► Twitter: https://twitter.com/TvCrashes{enter}
Send  ► Tumblr: http://AccidentCompilation.tumblr.com{enter}
Return

; [ ==== Auto Type === ]
^#p::
SetKeyDelay -1
Send TheliarLavenderPercheTiamo{pause}31
Return

; [ ==== Lock Computer After 20' === ]
^#z::
MsgBox, ,Lock Computer, Sleep My Wife, 3
{
Sleep, 1200000

DllCall("LockWorkStation")

Sleep, 3000

SendMessage,0x112,0xF170,2,,Program Manager
}
return

/*
; [ ==== Create Notepad "Post" === ]
^!p::
SetKeyDelay -1
Mouseclick, right
Sleep, 200
Send w
Sleep, 100
Send t
Sleep, 700
Send Post {enter}{enter}
;Send, {F5}
Return
*/

; [ ==== Reload Script === ]
^!+r::
MsgBox, ,Reload Title , Reload, 1
Reload
return

 ;[ ==== Exit Script === ]
^!+e:: 
MsgBox, ,Exit Title , Exit, 1
ExitApp
return

 ;[ ==== Button 4 && Button 5 === ]
#LButton::XButton1
Return
#RButton::XButton2
Return