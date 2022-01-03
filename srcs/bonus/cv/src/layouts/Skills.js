/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Skills.js                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: malatini <dev@malatini.dev>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2021/10/21 16:27:48 by malatini            #+#    #+#             */
/*   Updated: 2021/10/21 19:55:09 by malatini           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

import { makeStyles } from "@mui/styles"
import { Container, Grid, Typography } from "@mui/material";

const useStyles = makeStyles((theme: Theme) => ({
	skillComponent: {
		borderTop: `1px solid ${ theme.palette.divider }`,
		marginTop: 20,
	},
	skillsTitle: {
		textAlign: 'center',
		marginBottom: 50,
		marginTop: 50,
		'& > h6': {
			fontWeight: 600,
		},
	},
	skillContainer: {
		'& img': {
			width: 50,
			height: 50,
		}
	},
}))

export function Skills() {
	const cls = useStyles();

	return (
		<Container maxWidth='md' className={ cls.skillComponent }>
			<Container className={ cls.skillsTitle } maxWidth='md'>
				<Typography variant="h6">
					Techs I know
				</Typography>
			</Container>
			<Container>
				<Grid container justifyContent='center' spacing={3} className={ cls.skillContainer }>
					<Grid item>
						<img alt='bash' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bash/bash-original.svg" />
					</Grid>
					<Grid item>
						<img alt='C' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/c/c-original.svg" />
					</Grid>
					<Grid item>
						<img alt='C++' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" />
					</Grid>
					<Grid item>
						<img alt='docker' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" />
					</Grid>
					<Grid item>
						<img alt='electronJS' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/electron/electron-original.svg" />
					</Grid>
					<Grid item>
						<img alt='Flask (Python)' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flask/flask-original.svg" />
					</Grid>
				</Grid>
				<Grid container justifyContent='center' spacing={3} className={ cls.skillContainer }>
					<Grid item>
						<img alt='Golang' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg" />
					</Grid>
					<Grid item>
						<img alt='LUA' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/lua/lua-original.svg" />
					</Grid>
					<Grid item>
						<img alt='mongodb' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg" />
					</Grid>
					<Grid item>
						<img alt='nginx' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nginx/nginx-original.svg" />
					</Grid>
					<Grid item>
						<img alt='python 3' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" />
					</Grid>
					<Grid item>
						<img alt='reactJS' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" />
					</Grid>
				</Grid>
			</Container>
		</Container>
	)	
}