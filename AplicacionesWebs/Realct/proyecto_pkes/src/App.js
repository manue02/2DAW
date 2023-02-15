import { useState } from "react";
import { Container, Box, Typography, TextField, Button } from "@mui/material";
import { getPokemon } from "./api/pokemon";
import PokemonInfo from "./components/PokemonInfo";
import SearchHistory from "./components/SearchHistory";

function App() {
	const [query, setQuery] = useState("");
	const [pokemon, setPokemon] = useState(null);
	const [searchHistory, setSearchHistory] = useState([]);

	const handleSearch = async () => {
		if (!query) return;

		const newPokemon = await getPokemon(query);

		if (newPokemon) {
			setPokemon(newPokemon);
			setSearchHistory((prevHistory) => [newPokemon, ...prevHistory]);
		}
	};

	const handleClearHistory = () => {
		setSearchHistory([]);
	};

	return (
		<Container maxWidth="sm">
			<Box mt={4} display="flex" flexDirection="column" alignItems="center">
				<Typography variant="h4" component="h1" gutterBottom>
					Pokémon Search
				</Typography>
				<Box width="100%" mb={2}>
					<TextField label="Enter a Pokémon name or ID" fullWidth value={query} onChange={(e) => setQuery(e.target.value)} />
				</Box>
				<Button variant="contained" onClick={handleSearch}>
					Search
				</Button>
			</Box>
			{pokemon && <PokemonInfo pokemon={pokemon} />}
			<SearchHistory history={searchHistory} onClearHistory={handleClearHistory} />
		</Container>
	);
}

export default App;
