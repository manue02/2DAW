import { useState } from "react";
import { Grid, TextField, Button, Typography, Divider } from "@mui/material";
import SaltoLinea from "./componentes/SaltoLinea";

const PokemonInfo = ({ pokemon }) => {
	return (
		<Grid container spacing={2}>
			<Grid item xs={12}>
				<Typography variant="h6">{pokemon.name}</Typography>
			</Grid>
			<Grid item xs={4}>
				<img src={pokemon.sprites.front_default} alt="Front sprite" />
			</Grid>
			<Grid item xs={4}>
				<img src={pokemon.sprites.back_default} alt="Back sprite" />
			</Grid>
			<Grid item xs={4}>
				<Typography variant="body1">
					<strong>ID:</strong> {pokemon.id}
				</Typography>
				<Typography variant="body1">
					<strong>Altura:</strong> {pokemon.height / 10}m
				</Typography>
				<Typography variant="body1">
					<strong>Tipo:</strong> {pokemon.types.map((type) => type.type.name).join(", ")}
				</Typography>
			</Grid>
		</Grid>
	);
};

const PokemonSearch = () => {
	const [searchTerm, setSearchTerm] = useState("");
	const [pokemon] = useState(null);
	const [searchHistory, setSearchHistory] = useState([]);

	const handleSearch = async () => {
		const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${searchTerm.toLowerCase()}`);
		const data = await response.json();
		setSearchHistory((searchHistory) => [...searchHistory, data]);
	};

	const handleClearHistory = () => {
		setSearchHistory([]);
	};

	return (
		<Grid container spacing={2}>
			<Grid item xs={12}>
				<SaltoLinea />
				<TextField label="Buscar Pokemon" value={searchTerm} onChange={(e) => setSearchTerm(e.target.value)} fullWidth />
			</Grid>
			<Grid item xs={12}>
				<Button variant="contained" onClick={handleSearch}>
					Buscar
				</Button>
			</Grid>
			<Grid item xs={12}>
				{pokemon && <PokemonInfo pokemon={pokemon} />}
			</Grid>
			<Grid item xs={12}>
				{searchHistory.length > 0 && <Divider />}
				{searchHistory.map((pokemon, index) => (
					<div key={pokemon.id}>
						<PokemonInfo pokemon={pokemon} />
						{index !== searchHistory.length - 1 && <Divider />}
					</div>
				))}
			</Grid>
			<Grid item xs={12}>
				<Button variant="contained" onClick={handleClearHistory}>
					Limpiar historial
				</Button>
			</Grid>
		</Grid>
	);
};

const App = () => {
	return (
		<Grid container justifyContent="center" spacing={2}>
			<Grid item xs={12} md={6}>
				<PokemonSearch />
			</Grid>
		</Grid>
	);
};

export default App;
