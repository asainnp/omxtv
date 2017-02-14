#!/usr/bin/env bash

git clone https://github.com/AndrewFromMelbourne/raspidmx
cd raspidmx/pngview
make
cp -v pngview ../../../.
