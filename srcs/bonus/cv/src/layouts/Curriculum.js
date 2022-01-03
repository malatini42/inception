import { makeStyles  } from "@mui/styles";
import { Container } from "@mui/material";
import { Timeline, Content, ContentYear, ContentBody, Description } from '../timeline';

const useStyles = makeStyles((theme: Theme) => ({
	cvComponent: {
		textAlign: 'center',
		marginTop: 100,
		marginLeft: '15%',
		maxWidth: '80%',
	},
}));

function cvBorn() {
	return (
		<Content>
			<ContentYear startYear='1999' />
		</Content>
	)
}

function devSchool() {
	return (
		<Content>
			<ContentYear
				monthType='text'
				startMonth='05'
				startYear='2021'
				endDate={ '...' }
			/>
			<ContentBody title='42 Paris'>
				<Description text={ '[+] Joined 42 school !' } />
			</ContentBody>
		</Content>
	)
}

function bartenderJob() {
	return (
		<Content>
			<ContentYear
				monthType='text'
				startMonth='1'
				startYear='2019'
				endDate='Oct, 2020'
			/>
			<ContentBody title='Bartender'>
				<Description text="
					Been employed in a (very) famous bar"
				/>
				<Description text='' optional='full time' />
			</ContentBody>
		</Content>
	)
}

function bacPassed() {
	return (
		<Content>
			<ContentYear
				monthType='text'
				startYear='2017'
			/>
			<ContentBody title='BAC'>
				<Description text="Baccalaureate" />
				<Description text='' optional='European english mention' />
			</ContentBody>
		</Content>
	)
}

function luaDevelopper() {
	return (
		<Content>
			<ContentYear
				monthType='text'
				startYear='2016'
				startMonth='01'
				endDate='Sept, 2018'
			/>
			<ContentBody title='LUA developper'>
				<Description 
					text="Been coding for a famous LOL scripting platform" 
				/>
				<Description text='' 
					optional='Core/Assemblie developper' 
				/>
			</ContentBody>
		</Content>
	)
}

function firstExploit() {
	return (
		<Content>
			<ContentYear
				monthType='text'
				startYear='2015'
				startMonth='09'
				startDay='02'
			/>
			<ContentBody title='First Exploit published'>
				<Description
					text="First (POC) published on exploit-db"
				/>
				<Description text=''
					optional="Found in a well-known network scanning tool"
				/>
			</ContentBody>
		</Content>
	)
}

export function Curriculum() {
	const cls = useStyles();

	return (
		<Container maxWidth='md' className={ cls.cvComponent }>
			<Timeline>
				{ devSchool() }
				{ bartenderJob() }
				{ bacPassed() }
				{ luaDevelopper() }
				{ firstExploit() }
				{ cvBorn() }
			</Timeline>
		</Container>
	)
}