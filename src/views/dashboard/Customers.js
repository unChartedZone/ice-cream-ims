import React from 'react'

const Customers = () => {
  return (
    <div id="dashboard-homepage" className="container-fluid">
      <div className="row">
        <div id="dashboard-header" className="col-12">
          <h1 className="minty-text">Customers</h1>
        </div>
      </div>
      <div id="areaToPrint">
        <table className="table table-striped table-dark icetrack-table">
          <thead>
            <tr>
              <th scope="col">Customer Code</th>
              <th scope="col">Full Name</th>
              <th scope="col">Location</th>
              <th scope="col">Phone</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1235</td>
              <td>Name</td>
              <td>Location</td>
              <td>Phone</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div className="container-fluid form-components">
        <div className="icetrack-form-div">
          <div className="row">
            <div className="col-4">
              <form method="post">
                <div className="form-group dropdown-button-container">
                  <button
                    className="btn minty-button minty-dropdown-button btn-block"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                  >
                    <h1>
                      Add a Customer{' '}
                      <i
                        className="fa fa-arrow-circle-down"
                        aria-hidden="true"
                      ></i>
                    </h1>
                  </button>
                </div>
                <div id="collapseExample" className="collapse">
                  <div className="form-group">
                    <label htmlFor="fullName">Full Name</label>
                    <input
                      type="text"
                      className="form-control"
                      id="fullName"
                      name="fullName"
                      placeholder="Full Name"
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="location">Location</label>
                    <input
                      type="text"
                      className="form-control"
                      id="location"
                      name="location"
                      placeholder="Location"
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="phone">Phone Number</label>
                    <input
                      type="text"
                      className="form-control"
                      id="phone"
                      name="phone"
                      placeholder="Phone Number"
                    />
                  </div>
                  <div className="form-group">
                    <button type="submit" className="btn minty-button">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div className="col-4">
              <form method="get">
                <div className="form-group">
                  <button
                    id="deleteComponent"
                    className="btn minty-button minty-dropdown-button btn-block"
                    type="button"
                    data-toggle="collapse"
                    data-target="#deleteCollapse"
                    aria-expanded="false"
                    aria-controls="deleteCollapse"
                  >
                    <h1>
                      Delete a Customer
                      <i
                        className="fa fa-arrow-circle-down"
                        aria-hidden="true"
                      ></i>
                    </h1>
                  </button>
                </div>
                <div id="deleteCollapse" className="collapse">
                  <div className="form-group">
                    <label htmlFor="deletedCustomer">Customer Code</label>
                    <input
                      type="text"
                      className="form-control"
                      id="deletedCustomer"
                      name="deletedCustomer"
                      placeholder="Customer to delete"
                    />
                  </div>
                  <div className="form-group">
                    <button type="submit" className="btn minty-button">
                      Delete
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Customers
