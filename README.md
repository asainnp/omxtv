
# IPTV for Raspberry Pi.

* configured for: Moja WebTV, BHTelecom, Bosnia And Herzegovina.
* using OMXPlayer and shell scripts, without KODI.
* remote controlled by web interface, `http://omxtvraspberryIP/tv`, e.g. smartphone with home-shortcut to the link.

### Installation:

1. get any version of raspberry pi with raspbian or [archlinux-arm](https://archlinuxarm.org/platforms/armv7/broadcom/raspberry-pi-2). create functional static-ip network and ssh connection.
2. read [docs/dependencies](docs/dependencies) text file, ssh to pi and install dependencies first.
3. on rpi: `git clone https://github.com/asainnp/omxtv && cd omxtv && sudo make install`
4. on rpi: edit `/etc/omxtv/omxtv.conf` file to update credentials.
5. go to `http://omxtvraspberryIP/tv` and click "Power ON" button.
