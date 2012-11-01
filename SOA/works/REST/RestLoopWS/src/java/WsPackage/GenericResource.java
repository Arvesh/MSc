/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package WsPackage;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.GET;
import javax.ws.rs.Produces;

/**
 * REST Web Service
 *
 * @author Gulshan Bhaugeerothee <arvesh9@gmail.com>
 */
@Path("generic")
public class GenericResource {

  @Context
  private UriInfo context;

 
  public GenericResource() {
  }

  /**
   * Retrieves representation of an instance of WsPackage.GenericResource
   * @return an instance of java.lang.String
   */
  @GET
  @Path("{count}")
  @Produces("application/json")
  public String getJson() {
    //TODO return proper representation object
    
    
    
    throw new UnsupportedOperationException();
  }

  /**
   * PUT method for updating or creating an instance of GenericResource
   * @param content representation for the resource
   * @return an HTTP response with content of the updated or created resource.
   */
  @PUT
  @Consumes("application/json")
  public void putJson(String content) {
  }
}
