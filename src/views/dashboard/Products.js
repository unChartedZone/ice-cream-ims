import React from 'react'

const Products = () => {
  return (
    <div id="dashboard-homepage" className="container-fluid">
      <div className="row">
        <div id="dashboard-header" className="col-12">
          <h1 className="minty-text">Products</h1>
        </div>
      </div>
      <div id="areaToPrint">
        <table className="table table-striped table-dark icetrack-table">
          <thead>
            <tr>
              <th scope="col">Product Code</th>
              <th scope="col">Product Name</th>
              <th scope="col">Cost Price</th>
              <th scope="col">Selling Price</th>
              <th scope="col">Brand</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>123</td>
              <td>Vanilla</td>
              <td>$3.00</td>
              <td>$5.00</td>
              <td>Baskin-Robbins</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div className="container-fluid icetrack-form-div">
        <div className="row">
          <div className="col-4">
            <form method="post">
              <div className="form-group">
                <button
                  className="btn minty-button minty-dropdown-button btn-block"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseExample"
                >
                  <h1>
                    Add a Product{' '}
                    <i
                      className="fa fa-arrow-circle-down"
                      aria-hidden="true"
                    ></i>
                  </h1>
                </button>
              </div>
              <div id="collapseExample" className="collapse">
                <div className="form-group">
                  <label htmlFor="productName">Product Name</label>
                  <input
                    type="text"
                    className="form-control"
                    id="productName"
                    name="productName"
                    placeholder="Product Name"
                  />
                </div>

                <div className="form-group">
                  <label htmlFor="costPrice">Cost Price</label>
                  <input
                    type="text"
                    className="form-control"
                    id="costPrice"
                    name="costPrice"
                    placeholder="Cost Code"
                  />
                </div>

                <div className="form-group">
                  <label htmlFor="sellingPrice">Selling Price</label>
                  <input
                    type="text"
                    className="form-control"
                    id="sellingPrice"
                    name="sellingPrice"
                    placeholder="Selling Price"
                  />
                </div>

                <div className="form-group">
                  <label htmlFor="brand">Brand</label>
                  <input
                    type="text"
                    className="form-control"
                    id="brand"
                    name="brand"
                    placeholder="Brand"
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
        </div>
      </div>
    </div>
  )
}

export default Products
