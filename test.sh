#!/usr/bin/env bash
. forall.sh

export DBUS_SESSION_BUS_ADDRESS=`cat /tmp/omxplayerdbus.${USER:-root}`

dbus-send --print-reply --session --reply-timeout=500 --dest=org.mpris.MediaPlayer2.omxplayer \
	/org/mpris/MediaPlayer2 org.freedesktop.DBus.Properties.Set \
	string:"org.mpris.MediaPlayer2.Player" \
	string:"Volume" $1
