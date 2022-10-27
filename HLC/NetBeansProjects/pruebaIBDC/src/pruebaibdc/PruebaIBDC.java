
package pruebaibdc;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class PruebaIBDC {

    public static void main(String[] args) {
        // TODO code application logic here
        
        //Driver para mysql
    String sDriver = "com.mysql.jdbc.Driver";
    
    String sConsulta = "SELECT id,titulo,texto from noticias";
   
    //URL de jdbc 
    String sUrl_jdbc = "jdbc:mysql://localhost:3306/ejemplos";
    
     Connection conn = null;
            
            //ya e regsitrado el driver , ahora puedo conectarme

        try {
            Class.forName(sDriver);
            System.out.println("Driver cargado sin problemas");
        } catch (ClassNotFoundException ex) {
            System.out.println(ex.getMessage());
        }
        
        try {
            conn=DriverManager.getConnection(sUrl_jdbc,"root","");
                        System.out.println("Objeto conexion creado ");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
        try {
            Statement stmt = conn.createStatement();
            ResultSet rset = stmt.executeQuery(sConsulta);
            
            while (rset.next()){
            
                        System.out.println(rset.getString("texto"));
    
            }
            rset.close();
            stmt.close();
            conn.close();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

    }
    
    
}
