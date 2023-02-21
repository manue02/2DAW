import { Typography, Grid, Divider } from "@mui/material";

function BuscarHistorial({ historial }) {
	// BuscarHistorial es un componente que muestra el historial de búsquedas
	if (!historial || historial.length === 0) {
		//si no hay historial o el historial está vacío
		return null;
	}

	return (
		//muestra en el navegador el historial de busqueda
		<div>
			<Typography variant="h5" component="h2" gutterBottom>
				<p className="parrafo"> Historial de Busqueda</p>
			</Typography>

			{historial.map((pokemon) => (
				// map es un método de los arrays que permite iterar sobre cada uno de los elementos del array
				<Grid container spacing={2}>
					<Grid item xs={12}>
						<Divider />
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

export default BuscarHistorial;
