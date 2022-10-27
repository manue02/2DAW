import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author alumno
 */
public class DatosBD {

    String sDriver = "com.mysql.jdbc.Driver";
    String sConsulta = "SELECT id,titulo,texto from noticias";
    String sUrl_jdbc = "jdbc:mysql://localhost:3306/ejemplos";
    Connection conn = null;
    private ResultSet rset;
    private String mensaje = "Va bien";

    public DatosBD() {
        
         try {
            Class.forName(sDriver);
            System.out.println("Driver cargado sin problemas");
        } catch (ClassNotFoundException ex) {
            mensaje = ex.getMessage();
        }
        
        try {
            conn=DriverManager.getConnection(sUrl_jdbc,"root","");
                        System.out.println("Objeto conexion creado ");

        } catch (SQLException ex) {
            mensaje = ex.getMessage();
        }
        
        
    }

    /**
     * @return the rset
     */
    public ResultSet getRset() {
        Statement stmt;
        try {
            stmt = conn.createStatement();
             rset = stmt.executeQuery(sConsulta);
        }
        
        catch (SQLException ex) {
            
            setMensaje(ex.getMessage());
            
        }
        
        return rset;
    }

    /**
     * @param rset the rset to set
     */
    public void setRset(ResultSet rset) {
        this.rset = rset;
    }

    /**
     * @return the mensaje
     */
    public String getMensaje() {
        return mensaje;
    }

    /**
     * @param mensaje the mensaje to set
     */
    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }
    
}
