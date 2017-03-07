#!/usr/bin/env bash

# replacing first 5 chars of text "Lavf/..." to "OmxTV" inside string "Lavf/57.56.10X" 
# of binary file: /usr/lib/libavformat.so.57.56.10X 
# That is user-agent string of http requests in hls segments downloads by ffmpeg.
# vlc is probably forbidden by bhtelecom, but Kodi which uses omxplayer is allowed.
# There was probably decision fault by them to deny by ua-strings because both
# vlc and kodi->omxplayer uses ffmpeg(libav) in lower layers for http download.
# and this way they (hopefully unintentional) blocked all apps that uses ffmpeg,
# which includes omxplayer and Kodi too. so ua change is legal because official 
# Kodi plugin (https://webtv.bhtelecom.ba/repo/) won't work without it too.

# ... all of this can be done manually by using e.g. 'vi editor' carefully.
# script is here for possible make-file automatization.

case "$1" in
   showbin) command -v omxplayer.bin             && exit 0   || { echo "error 1, omxplayer.bin not found"; exit 1; } ;;
   showlib) omxpbin="$($0 showbin)"                          || { echo "error 2, omxplayer.bin not found"; exit 2; }
            lddline="$(ldd $omxpbin | grep libavformat)";  
                    [ $(echo "$lddline" | grep -c .) -eq 1 ] || { echo "error, multi lib lines found";     exit 3; }
            symlink="$(echo $lddline | cut -d' ' -f3)"
            library=$(readlink -f $symlink)                                                             || exit 4
            echo $library && exit 0
            ;;
   patchready) lib="$($0 showlib)"                           || { echo "error 5, lib not found";           exit 5; }
	    echo "looking for Lavf/ or OmxTv uastring in $lib"
            if ! grep 'Lavf/' $lib; then #Lavf/ string not found:
               grep 'OmxTV' $lib                             && { echo "error 6, Patch is already OK!";    exit 6; }
	       echo "error 7, Lavf/ string not found, patch not possible.";                                exit 7
	    fi
            echo "ok, Lavf/ found, file is ready for patching."; exit 0
            ;;
   patchok) $0 patchready >/dev/null ; [ $? -eq 6 ] && { echo ok; exit 0; }                 || { echo err; exit 8; } 
            ;;
   dopatch) $0 patchready                                    || { echo "error 9, patch is not ready";      exit 9; }
	    avflib="$($0 showlib)" || exit $?
	    echo "paching with perl..."
	    perl -pi.bkp -e 's/Lavf\/([0-9.]{3,8})/OmxTV\1/' $avflib
	    $0 patchok ; exit $?
            ;;
   patchback) $0 patchok                                     || { echo "error 10, patch is not OK";        exit 10; }
	    avflib="$($0 showlib)" || exit $?
	    echo "paching BACK with perl..."
	    perl -pi.bkp -e 's/OmxTV([0-9.]{3,8})/Lavf\/\1/' $avflib
	    $0 patchready && { echo "patch back OK"; exit 0; } || { echo "error in patchback";             exit 11; }
            ;;
	 *) echo "unknown param 1, use [showbin|showlib|patchready|patchok|dopatch|patchback]"; exit 33 ;;
esac
exit 44
