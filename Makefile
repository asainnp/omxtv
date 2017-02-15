default: all

installdir = /opt/omxtv
  allfiles = forall.sh tv tvloop tvosd tvauthloop tvosd audio cmdloop controller tvsingle tvchlist.txt \
             tools/omxtv.service tools/daynight tools/pngview
apacheroot = /srv/httpd

all: $(allfiles)

install:
	mkdir -p $(installdir)/tools
	cp -v $(allfiles) $(installdir)/
	cp -rv webcontrol $(installdir)/
	ln -s $(installdir)/webcontrol $(apacheroot)/tv
	ln -s $(installdir)/tools/omxtv.service /etc/systemd/system/multi-user.target.wants/omxtv.service

uninstall:
	rm $(apacheroot)/tv
	rm /etc/systemd/system/multi-user.target.wants/omxtv.service #symlink
	rm -rf $(installdir)

tools/pngview:
	cd tools/pngviewsrc && make
