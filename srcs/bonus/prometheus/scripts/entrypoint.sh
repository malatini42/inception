sed -i "s/CADVISOR_PORT/$CADVISOR_PORT/g" /etc/prometheus/prometheus.yml
sed -i "s/PROMETHEUS_PORT/$PROMETHEUS_PORT/g" /etc/prometheus/prometheus.yml

prometheus