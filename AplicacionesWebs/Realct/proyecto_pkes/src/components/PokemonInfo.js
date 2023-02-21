import { Grid, Typography } from "@mui/material";

function PokemonInfo({ pokemon }) {
	// PokemonInfo es un componente que muestra la información de un pokemon en concreto con el nombre, id, altura, tipo y sprites
	return (
		<Grid container spacing={2}>
			{/* Grid es un componente de Material UI que permite crear una estructura de grilla como en bootstrap*/}
			<Grid item xs={12}>
				<Typography variant="h6">{pokemon.name}</Typography>
				{/* Typography es un componente de Material UI que permite mostrar texto */}
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
					{/* Todos los variant son estilos de Material UI en especifico de Typography */}
					<strong>Tipo:</strong> {pokemon.types.map((type) => type.type.name).join(", ")}
					{/* join es un método de los arrays que permite unir todos los elementos de un array en un string */}
				</Typography>
			</Grid>
		</Grid>
	);
}

export default PokemonInfo;
