import { useState } from "react";
import { Container, Box, Typography, TextField, Button, Grid } from "@mui/material";
import PokemonInfo from "./components/PokemonInfo";
import BuscarHistorial from "./components/Busqueda";

function App() {
	// App es el componente principal de la aplicación web que se muestra en el navegador
	const [GuardaInput, setGuardaInput] = useState(""); //guardarInput es una variable de estado que guarda el valor del input
	const [pokemon] = useState(null); //pokemon es una variable de estado que guarda la información del pokemon
	const [Buscar, SetBuscarHistorial] = useState([]); //useState es una función que permite crear variables de estado

	const BtnBuscar = async () => {
		// BtnBuscar es una función que se ejecuta cuando se pulsa el botón Buscar
		const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${GuardaInput.toLowerCase()}`);
		const data = await response.json();
		SetBuscarHistorial((Buscar) => [data, ...Buscar]);
	};

	const LimpiarHistorial = () => {
		// LimpiarHistorial es una función que se ejecuta cuando se pulsa el botón Limpiar historial
		SetBuscarHistorial([]); //SetBuscarHistorial es una función que permite modificar el estado de la variable Buscar
	};

	return (
		// return es lo que se muestra en el navegador
		<Container maxWidth="sm">
			<Box mt={4} display="flex" flexDirection="column" alignItems="center">
				<Typography variant="h4" component="h1" gutterBottom>
					Busca tu Pokemon
				</Typography>
				<Box width="100%" mb={2}>
					<TextField label="Introduce el Pokemon o el ID" fullWidth value={GuardaInput} onChange={(e) => setGuardaInput(e.target.value)} />
					{/* setGuardaInput es una función que permite modificar el estado  */}
				</Box>
				<Button variant="contained" onClick={BtnBuscar}>
					Buscar
				</Button>
			</Box>
			{/* box es un componente de Material UI que permite centrar el contenido de la página */}
			{pokemon && <PokemonInfo pokemon={pokemon} />}
			{/* muestra el componente PokemonInfo */}
			<BuscarHistorial historial={Buscar} onClearHistory={LimpiarHistorial} />
			<Grid item xs={12}>
				<Button variant="contained" onClick={LimpiarHistorial}>
					Limpiar historial
				</Button>
			</Grid>
		</Container>
		// <Container maxWidth="sm"> es un componente de Material UI que permite centrar el contenido de la página
	);
}

export default App;

// Path: https://github.com/manue02
