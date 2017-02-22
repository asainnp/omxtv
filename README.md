
# IPTV for Raspberry Pi.

* configured for: Moja WebTV, BHTelecom, Bosnia And Herzegovina.
* using OMXPlayer and shell scripts, without KODI.
* remote controlled by web interface, `http://omxtvraspberryIP/tv`, e.g. smartphone with home-shortcut to the link.

### Installation:

1. get any version of raspberry pi with arm linux distribution (e.g. raspbian or [https://archlinuxarm.org/platforms/armv7/broadcom/raspberry-pi-2](archlinux-arm)) and working static-ip cable or wifi network connection.
2. read [docs/dependencies](docs/dependencies) text file and install them first.
3. on rpi: `git clone https://github.com/asainnp/omxtv && cd omxtv && sudo make install`
4. on rpi: edit /etc/omxtv/omxtv.conf file to update credentials.
5. go to http://omxtvraspberryIP/tv and click "turn on" html button.

