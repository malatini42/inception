# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    entrypoint.sh                                      :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/25 14:09:19 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 14:51:40 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

sed -i "s/PROMETHEUS_PORT/$PROMETHEUS_PORT/g" /monitor/grafana/conf/provisioning/datasources/prometheus.yml

./bin/grafana-server