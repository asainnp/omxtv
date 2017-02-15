# we are in tools/pngviewsrc/. , destionation is tools

dstdir = ..

default: all

all: $(dstdir)/pngview

$(dstdir)/pngview: raspidmx raspidmx/pngview/pngview
	cp -v raspidmx/pngview/pngview $(dstdir)/.

raspidmx:
	git clone https://github.com/AndrewFromMelbourne/raspidmx

raspidmx/pngview/pngview:
	cd raspidmx/pngview && make
