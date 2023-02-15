import { useState } from "react";
import { Button, TextField } from "@mui/material";

function SearchBar({ onSearch }) {
	const [query, setQuery] = useState("");

	const handleSearch = () => {
		if (query.trim()) {
			onSearch(query);
			setQuery("");
		}
	};

	return (
		<div>
			<TextField label="Search Pokémon by name or ID" variant="outlined" size="small" value={query} onChange={(e) => setQuery(e.target.value)} />
			<Button variant="contained" onClick={handleSearch}>
				Search
			</Button>
		</div>
	);
}

export default SearchBar;
