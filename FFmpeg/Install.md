# Install FFMPEG and libx264 install package
===
###ffmpeg-2.4.1.tar.bz2
---
###last_x264.tar.bz2

auto:        (if no permissions input sudo)
---
1.
libx264 need yasm,so first install yasm
apt-get install yasm

2.
then libx264
aptitude install libx264-dev 

manual:
---
1.
unzip  libx264
tar -xjvf last_x264.tar.bz2 

2.
install libx264
./configure --enable-shared --enable-pic  
make  
make install  

##install ffmpeg  Depend on the package

1.libfaac
---
aptitude install libfaac-dev

2.libmp3lame
---
aptitude install libmp3lame-dev  

3.libtheora
---
aptitude install libtheora-dev 

4.libvorbis
---
aptitude install libvorbis-dev

5.libxvid
---
aptitude install libxvidcore-dev 

6.libxext
---
aptitude install libxext-dev

7.libxfixes
---
aptitude install libxfixes-dev 

##install ffmpeg

1.
unzip ffmpeg
---
tar -xjvf ffmpeg-2.4.1.tar.bz2  

2.
compile an  install
---
./configure --prefix=/usr/local/ffmpeg --enable-gpl --enable-version3 --enable-nonfree --enable-postproc --enable-pthreads --enable-libfaac --enable-libmp3lame --enable-libtheora --enable-libx264 --enable-libxvid --enable-x11grab --enable-libvorbis  

3.over
-----
make  
make install  
 
