import React from "react";
import { Container, CssBaseline } from "@mui/material";
import { createTheme, ThemeProvider } from "@mui/material/styles";
import { Header, Introduction, Curriculum, Skills, Footer } from "./layouts";

export default function App() {
	const primary_color = '#1f1f1f';
	const text_color = '#ffffff'

	const darkMode = createTheme({
		typography: {
			fontFamily: 'monospace',
			fontWeigth: 20,
		},
		palette: {
			mode: 'dark',
			primary: {
				main: primary_color,
			},
			text: {
				primary: text_color,
			},
			background: {
				default: primary_color,
				paper: primary_color,
			}
		}
	});

  return (
		<ThemeProvider theme={ darkMode }>
			<CssBaseline />
			<Container maxWidth="md" style={{ margin: '40px auto' }}>
				<Header />
				<Introduction />
				<Curriculum />
				<Skills />
				<Footer />
			</Container>
		</ThemeProvider>
	);
}
