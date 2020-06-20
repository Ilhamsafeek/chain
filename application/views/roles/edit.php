<div class="mainpanel">
  <div class="pageheader">
    <div class="media">
      <div class="pageicon pull-left">
        <i class="fa fa-home"></i>
      </div>
      <div class="media-body">
        <ul class="breadcrumb">
          <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
          <li>Profiles</li>
        </ul>
        <h4>Edit Role</h4>
      </div>
    </div><!-- media -->
  </div><!-- pageheader -->
  <div class="contentpanel">

    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>


    <form role="form" action="<?php base_url('roles/update') ?>" method="post">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Enter role name" value="<?php echo $role_data['role']; ?>" autocomplete="off">
          </div>
        </div>
      </div>


      <div class="ibox ">
        <div class="ibox-title">
          <h5>Permissions </h5>
          <?php $serialize_permission = unserialize($role_data['permission']); ?>

        </div>

        <div class="ibox-content">

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>

                  <th></th>
                  <th>Create </th>
                  <th>Update </th>
                  <th>View</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                <tr>

                <tr>
                  <td>Roles</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createRole" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('createRole', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateRole" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('updateRole', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewRole" <?php
                                                                                                  if ($serialize_permission) {
                                                                                                    if (in_array('viewRole', $serialize_permission)) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }
                                                                                                  ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteRole" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('deleteRole', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                </tr>


                <td>Users</td>
                <td><input type="checkbox" name="permission[]" id="permission" value="createUser" <?php if ($serialize_permission) {
                                                                                                    if (in_array('createUser', $serialize_permission)) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  } ?>></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" <?php
                                                                                                  if ($serialize_permission) {
                                                                                                    if (in_array('updateUser', $serialize_permission)) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }
                                                                                                  ?>></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" <?php
                                                                                                if ($serialize_permission) {
                                                                                                  if (in_array('viewUser', $serialize_permission)) {
                                                                                                    echo "checked";
                                                                                                  }
                                                                                                }
                                                                                                ?>></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" <?php
                                                                                                  if ($serialize_permission) {
                                                                                                    if (in_array('deleteUser', $serialize_permission)) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }
                                                                                                  ?>></td>
                </tr>
                <tr>
                  <td>Suppliers</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createSupplier" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createSupplier', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSupplier" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateSupplier', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewSupplier" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewSupplier', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteSupplier" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deleteSupplier', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>
                <tr>
                  <td>Customers</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createCustomer" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createCustomer', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateCustomer" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateCustomer', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewCustomer" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewCustomer', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteCustomer" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deleteCustomer', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>


                <tr>
                  <td>Employees</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createEmployee" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createEmployee', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateEmployee" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateEmployee', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewEmployee" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewEmployee', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteEmployee" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deleteEmployee', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>
                <tr>
                  <td>Main Stock</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createMainStock" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('createMainStock', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateMainStock" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('updateMainStock', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewMainStock" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('viewMainStock', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteMainStock" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('deleteMainStock', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                </tr>

                <tr>
                  <td>Finished Products</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createFinishedProduct" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('createFinishedProduct', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateFinishedProduct" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('updateFinishedProduct', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewFinishedProduct" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('viewFinishedProduct', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteFinishedProduct" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('deleteFinishedProduct', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                </tr>
                <tr>
                  <td>Purchase</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createPurchase" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createPurchase', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updatePurchase" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updatePurchase', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewPurchase" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewPurchase', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deletePurchase" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deletePurchase', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>
                <tr>
                  <td>Sales</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createSale" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('createSale', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSale" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('updateSale', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewSale" <?php
                                                                                                  if ($serialize_permission) {
                                                                                                    if (in_array('viewSale', $serialize_permission)) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }
                                                                                                  ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteSale" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('deleteSale', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                </tr>
                <tr>
                  <td>Expenses</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createExpense" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createExpense', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateExpense" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateExpense', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewExpense" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewExpense', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteExpense" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deleteExpense', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>

                <tr>
                  <td>Manufacturing</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createManufacturing" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('createManufacturing', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateManufacturing" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('updateManufacturing', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewManufacturing" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('viewManufacturing', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteManufacturing" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('deleteManufacturing', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                </tr>
                <tr>
                  <td>Reports</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewReport" <?php
                                                                                                    if ($serialize_permission) {
                                                                                                      if (in_array('viewReport', $serialize_permission)) {
                                                                                                        echo "checked";
                                                                                                      }
                                                                                                    }
                                                                                                    ?>></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Payroll</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createPayroll" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('createPayroll', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updatePayroll" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updatePayroll', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewPayroll" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewPayroll', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deletePayroll" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deletePayroll', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                </tr>
                <tr>
                  <td>Setting</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateSetting', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
              </tbody>
            </table>

            <tbody>

            </tbody>



          </div>


          <div class="hr-line-dashed"></div>
          <div class="form-group row">
            <div class="col-sm-4 col-sm-offset-2">

              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="<?php echo base_url('roles/') ?>" class="btn btn-warning">Back</a>
            </div>
          </div>

        </div>






    </form>
  </div>
</div>

</div>
</div>


<script>
  $(document).ready(function() {
    $("#profileMainMenu").addClass('active');
    $("#rolesMenu").addClass('active');

    $('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
    });
  });
</script>