function welcome(props) {
	return <h1>Hello, {props.name}</h1>;
}

const root = ReactDOM.createRoot(document.getElementById("root"));
const element = <welcome name="Sara" />;
root.render(element);
