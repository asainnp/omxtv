#script supposed to be sourced with . forall.sh

logdir="/tmp/omxtvstatuslog" #note: when changing var logdir, or pidfilecmdloop, 
mkdir -p "$logdir"           #      change pid location too inside omxtv.service.
pidfilecmdloop=$logdir/cmdloop.pid

defaultchannel="bht1" # defchan -for case that lastchannel file do not exists
defaultaudiovol="10"  # 10%

function inarray()
{  search="$1"; shift
   for i in "$@"; do [ "$search" == "$i" ] && return 0; done; return 1
}		
function indexof()
{  search="$1"; shift; arr=( $@ )
   for i in "${!arr[@]}"; do [ "$search" == "${arr[$i]}" ] && { echo $i; return 0; }; done
   echo -1; return 1
}		
function killafter() 
{  [ -z "$1" ] || [ -z "$2" ] && return 1
   sleep $1; kill $2; return 0
}
function filevar() { [ -f "$1" ] && cat "$1" || echo -n "$2"; }
