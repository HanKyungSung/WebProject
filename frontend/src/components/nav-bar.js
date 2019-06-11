import React, { Component } from "react";
import "./nav-bar.css";
import NavBarButton from "./nav-bar-button";
import Logo from "./logo";

class NavBar extends Component {
  render() {
    return (
      <nav className="navbar fixed-top navbar-expand-lg navbar-light bg-light justify-content-center">
        <ul className="nav justify-content-between custom-nav-bar">
          <li className="nav-item custom-nav-item">
            <Logo />
          </li>
          <li className="nav-item custom-nav-item">
            <form className="form-inline">
              <div className="md-form my-0">
                <input
                  className="form-control"
                  type="text"
                  placeholder="Search"
                  aria-label="Search"
                />
              </div>
              <button
                href="#!"
                className="btn btn-outline-white btn-md my-0 ml-sm-2"
                type="submit"
              >
                Search
              </button>
            </form>
          </li>
          <li className="nav-item">
            <a className="nav-link active" href="#">
              <NavBarButton name="Jobs" />
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link active" href="#">
              <NavBarButton name="News" />
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link active" href="#">
              <NavBarButton name="Thread" />
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link active" href="#">
              <NavBarButton name="Used" />
            </a>
          </li>
        </ul>
      </nav>
    );
  }
}

export default NavBar;
