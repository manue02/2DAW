import { CircularProgress, Divider, List, ListItem, ListItemText, Typography } from "@mui/material";

function PokemonInfo({ pokemon, loading }) {
	if (loading) {
		return <CircularProgress />;
	}

	if (!pokemon) {
		return null;
	}

	const { id, name, types, height, sprites } = pokemon;

	return (
		<div>
			<Typography variant="h4">{name}</Typography>
			<Typography>ID: {id}</Typography>
			<Typography>Types: {types.map((type) => type.type.name).join(", ")}</Typography>
			<Typography>Height: {height} dm</Typography>
			<List>
				<ListItem>
					<ListItemText primary="Front Sprite" secondary={<img src={sprites.front_default} alt={name} />} />
				</ListItem>
				<ListItem>
					<ListItemText primary="Back Sprite" secondary={<img src={sprites.back_default} alt={name} />} />
				</ListItem>
			</List>
			<Divider />
		</div>
	);
}

export default PokemonInfo;
