/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Introduction.js                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: malatini <dev@malatini.dev>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2021/10/18 16:01:35 by malatini            #+#    #+#             */
/*   Updated: 2021/10/21 19:57:44 by malatini           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

import { Container, Paper, Typography } from "@mui/material";
import { makeStyles } from "@mui/styles";

const useStyles = makeStyles((theme : Theme) => ({
	introduction: {
		textAlign: 'center',
		marginTop: 100,
		marginBottom: 50,
		'& > h3': {
			fontWeight: 600,
		}
	},
	statsContainer: {
		marginTop: 75,
		backgroundColor: theme.palette.background.default,
	},
}));

export function Introduction() {
	const	badge_url 	= 'https://badge42.herokuapp.com/api/stats/';
	const	login 		= 'malatini';
	const	opts		= '';

	const cls = useStyles();

	return (
		<Container maxWidth="md" className={ cls.introduction }>
			<Typography variant="h3">
				Hello,
			</Typography>
			<Typography>
				My login is malatini
			</Typography>
			<Paper className={ cls.statsContainer } elevation={0}>
				<img
					src={ badge_url + login + opts }
					alt="42badge stats"
				/ >					
			</Paper>
		</Container>
	)
}
