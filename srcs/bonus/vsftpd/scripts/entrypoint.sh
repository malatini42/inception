
conf_file="/etc/vsftpd/vsftpd.conf"
grep -E "local_root=" $conf_file > /dev/null 2>&1
if [ $? -eq 0 ]; then
  adduser $FTP_USER --disabled-password --gecos "" --home /home/$FTP_USER --shell /bin/bash
  echo "$FTP_USER:$FTP_PWD" | chpasswd > /dev/null

  chgrp -R $FTP_USER $FTP_ROOT
  chown -R $FTP_USER: $FTP_ROOT
  chmod -R u+w $FTP_ROOT

  echo "" >> $conf_file
  echo "local_root=$FTP_ROOT" >> $conf_file
fi
vsftpd $conf_file
