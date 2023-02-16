import { Typography, Grid } from "@mui/material";

function SearchHistory({ history }) {
	if (!history || history.length === 0) {
		return null;
	}

	return (
		<div>
			{history.map((pokemon) => (
				<Grid container spacing={2}>
					<Grid item xs={12}>
						<Typography variant="h6">{pokemon.name}</Typography>
					</Grid>
					<Grid item xs={4}>
						<img src={pokemon.sprites.front_default} alt="De frente sprite" />
					</Grid>
					<Grid item xs={4}>
						<img src={pokemon.sprites.back_default} alt="Atras sprite" />
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
			))}
		</div>
	);
}

export default SearchHistory;
