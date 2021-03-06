###################################
default: all

installdir = /opt/omxtv
   confdir = /etc/omxtv
 mainfiles = $(addprefix scripts/,forall.sh tv tvloop tvauthloop tvosd tvaudio cmdloop controller tvsingle)
 toolfiles = $(addprefix tools/,omxtv.service daynight pngview uastring.sh)
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

configfiles: $(confdir) $(confdir)/omxtv.conf
$(confdir):
	mkdir -p $@
$(confdir)/omxtv.conf:
	cp tools/omxtv.conf.example $@
	chmod 600 $@
###################################
