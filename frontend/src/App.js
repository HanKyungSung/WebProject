import React from "react";
import "./App.css";
import NavBar from "./components/nav-bar";
import StatContainer from "./components/stat-container";
import ThreadContainer from "./components/thread-container";
import HotThreadContainer from "./components/hot-thread-container";

async function test() {
	fetch(process.env.REACT_APP_API_BASE_URL).then(function(response) {
    response.text().then(function(data) {
		console.log(data);
    });
  });
}

function App() {
  test();
  console.log("asdf");

  return (
    <div>
      <NavBar/>
	  	<div className="global-container">
			<div className="side-container">
				<StatContainer />
			</div>
			<div className="body-container">
				<ThreadContainer />
			</div>
			<div className="side-container">
				<HotThreadContainer />
			</div>
		</div>
	</div>
  );
}

export default App;
