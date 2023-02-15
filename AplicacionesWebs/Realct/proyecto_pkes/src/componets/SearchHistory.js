import { Button, List, ListItem, ListItemText } from "@mui/material";

function SearchHistory({ history, onClear }) {
	if (!history || history.length === 0) {
		return null;
	}

	return (
		<div>
			<List>
				{history.map((pokemon) => (
					<ListItem key={pokemon.id}>
						<ListItemText primary={pokemon.name} secondary={`ID: ${pokemon.id}`} />
					</ListItem>
				))}
			</List>
			<Button variant="contained" onClick={onClear}>
				Clear history
			</Button>
		</div>
	);
}

export default SearchHistory;
