###################################
default: all

installdir = /opt/omxtv
   confdir = /etc/omxtv
 mainfiles = forall.sh tv tvloop tvosd tvauthloop tvosd tvaudio cmdloop controller tvsingle tvchlist.txt
 toolfiles = tools/omxtv.service tools/daynight tools/pngview
  allfiles = $(mainfiles) $(toolfiles)
apacheroot = /srv/http
  sysdlink = /etc/systemd/system/multi-user.target.wants/omxtv.service

###################################
all: $(allfiles)

tools/pngview:
	cd tools/pngviewsrc && make

###################################
# note: overwriting new version do not need uninstall before install.
#
install: configfiles
	mkdir -p $(installdir)/tools
	cp -v $(mainfiles) $(installdir)/
	cp -v $(toolfiles) $(installdir)/tools
	cp -rv webcontrol $(installdir)/
	[ -L $(apacheroot)/tv ] || ln -s $(installdir)/webcontrol          $(apacheroot)/tv
	[ -L $(sysdlink)      ] || ln -s $(installdir)/tools/omxtv.service $(sysdlink)
uninstall:
	rm -f $(apacheroot)/tv
	rm -f /etc/systemd/system/multi-user.target.wants/omxtv.service #symlink
	rm -rfv $(installdir)

uninstallconf:
	rm -rfv $(confdir)

fulluninstall: uninstall uninstallconf

configfiles: $(confdir) $(confdir)/userpass $(confdir)/tvaddresses
$(confdir):
	mkdir -p $@
$(confdir)/userpass:
	echo -e "userhere\npasswordhere" > $@
	chmod 600 $@
$(confdir)/tvaddresses:
	echo -e "192.168.1.11\n192.168.1.12\n192.168.1.13" > $@
###################################
