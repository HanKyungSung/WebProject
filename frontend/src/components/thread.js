import React, { Component } from 'react';

class Thread extends Component {
    render () {
        return (
            <div className="card">
                <h5 className="card-header">Tags/Title</h5>
                <div className="card-body">
                    <h5 className="card-title">Title</h5>
                    <p className="card-text">Content</p>
                </div>
            </div>
        );
    }
}

export default Thread;