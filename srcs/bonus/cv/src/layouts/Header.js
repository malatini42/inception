/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Header.js                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: malatini <dev@malatini.dev>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2021/10/18 16:01:39 by malatini            #+#    #+#             */
/*   Updated: 2021/10/21 19:48:57 by malatini           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

import { makeStyles } from "@mui/styles";
import { AppBar, Toolbar, Grid, Typography, Link } from "@mui/material";

const useStyles = makeStyles((theme: Theme) => ({
	header: {
		textAlign: 'center',
		height: 80,
		backgroundColor: theme.palette.background.default,
		borderBottom: `1px solid ${ theme.palette.divider }`,
		'& div div div': {
			maxWidth: '100%',
			'& div > div > a': {
				color: theme.palette.text.primary,
			}
		}
	},
	linkContainer: {
		'& > div': {
			width: '20%',
		}
	}
}));

export function Header() {
	const cls = useStyles();

	const openTwitter = () => window.open('https://twitter.com/malatini', '_blank');
	const openGithub = () => window.open('https://github.com/malatini', '_blank');
	const openMail = () => window.open('mailto:dev@malatini.dev', '_blank');

	return (
		<AppBar position='static' className={ cls.header } elevation={ 0 }>
			<Toolbar>
				<Grid container direction='row' justify='center' alignItems='center'>
						<Grid item xs={ 6 } style={{ textAlign: 'left '}}>
							<Typography variant="h6">malatini</Typography>
							<Typography>42 School Student</Typography>
						</Grid>
						
						<Grid item xs={ 6 }>
							<Grid container direction='row' justify='center' 
								alignItems='center' spacing={ 3 }
									className={ cls.linkContainer }>
								<Grid />
								<Grid />
								<Grid item>
									<Link onClick={() => openMail()}>Mail</Link>
								</Grid>
								<Grid item>
									<Link onClick={() => openGithub()}>Github</Link>
								</Grid>
								<Grid item>
									<Link onClick={() => openTwitter()}>Twitter</Link>
								</Grid>
							</Grid>
						</Grid>
				</Grid>
			</Toolbar>
		</AppBar>
	)
}
