import { useState } from "react";
import { Container, Box, Typography, TextField, Button, Grid } from "@mui/material";
import PokemonInfo from "./components/PokemonInfo";
import BuscarHistorial from "./components/Busqueda";

function App() {
	// App es el componente principal de la aplicación web que se muestra en el navegador
	const [GuardaInput, setGuardaInput] = useState("");
	const [pokemon] = useState(null);
	const [Buscar, SetBuscarHistorial] = useState([]); //useState es una función que permite crear variables de estado

	const handleSearch = async () => {
		// handleSearch es una función que se ejecuta cuando se pulsa el botón Buscar
		const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${GuardaInput.toLowerCase()}`);
		const data = await response.json();
		SetBuscarHistorial((Buscar) => [data, ...Buscar]);
	};

	const LimpiarHistorial = () => {
		// LimpiarHistorial es una función que se ejecuta cuando se pulsa el botón Limpiar historial
		SetBuscarHistorial([]); //SetBuscarHistorial es una función que permite modificar el estado de la variable searchHistory
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
				</Box>
				<Button variant="contained" onClick={handleSearch}>
					Buscar
				</Button>
			</Box>

			{pokemon && <PokemonInfo pokemon={pokemon} />}

			<BuscarHistorial historial={Buscar} onClearHistory={LimpiarHistorial} />
			<Grid item xs={12}>
				<Button variant="contained" onClick={LimpiarHistorial}>
					Limpiar historial
				</Button>
			</Grid>
		</Container>
	);
}

export default App;
