import java.sql.Connection;
import java.util.ArrayList;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumno
 */
public class locales {

   private String nombre;
   private String zona;
   private String direccion;
   private String[] formas_pago;
   private String mensaje;
 //si pongo esto no funciona
    // public locales() {
    //   if (g_ocio.idLocal.equals("")){
     //      recoge_datos(g_ocio.idLocal);
     //  }
        
  //  }
  
public void recoge_datos(String pIdLocal){
nombre=MySQL_Util.ObtenerDato("peliculas", "id", pIdLocal, "peli_nombre");
direccion=MySQL_Util.ObtenerDato("peliculas", "id", pIdLocal, "peli_anno");
zona=MySQL_Util.ObtenerDato("peliculas", "id", pIdLocal, "peli_tipo");
//Obtener las formas de pago del local
String cadsql="SELECT id_persona FROM participantes";
cadsql+=" WHERE id_pelicula="+pIdLocal;
formas_pago=MySQL_Util.Llenar_Seleccionados(g_ocio.Conn,cadsql,"ID_PERSONA");
}
    /**
     * @return the nombre
     */
    public String getNombre() {
        return nombre;
    }

    /**
     * @param nombre the nombre to set
     */
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    /**
     * @return the zona
     */
    public String getZona() {
        return zona;
    }

    /**
     * @param zona the zona to set
     */
    public void setZona(String zona) {
        this.zona = zona;
    }

    /**
     * @return the direccion
     */
    public String getDireccion() {
        return direccion;
    }

    /**
     * @param direccion the direccion to set
     */
    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    /**
     * @return the formas_pago
     */
    public String[] getFormas_pago() {
        return formas_pago;
    }

    /**
     * @param formas_pago the formas_pago to set
     */
    public void setFormas_pago(String[] formas_pago) {
        this.formas_pago = formas_pago;
    }
    public ArrayList getListaZonas(){
        String cadena="SELECT id,nombre FROM tipos order by nombre";
        return MySQL_Util.Llenar_Lista(g_ocio.Conn, cadena);
    }
    public ArrayList getListaFPagos(){
        String cadena="SELECT * FROM personas";
        return MySQL_Util.Llenar_Lista(g_ocio.Conn, cadena);
    }
    public String guardar_L(){
        //INsert en locales
        String insert1="INSERT INTO peliculas(peli_nombre,peli_tipo,peli_anno) VALUES('";
        insert1+=nombre+"',"+zona+",'"+direccion+"')";       
        int idNuevoLocal=MySQL_Util.Ej_Consulta_Id_Auto(g_ocio.Conn,insert1);
        //INsert en locales_formas_pago
        mensaje=idNuevoLocal+"";
        for (int i=0;i<formas_pago.length;i++){
            String insert2="INSERT INTO participantes ";
            insert2+=" VALUES("+idNuevoLocal+","+formas_pago[i]+")";
            MySQL_Util.Ej_ConsultaAccion(g_ocio.Conn, insert2);
        
        }
        return "index";
    }

    /**
     * @return the mensaje
     */
    public String getMensaje() {
        return mensaje;
    }
     public String modificar_local(){
        //primero modifico en locales
    String cadsql1="UPDATE peliculas SET peli_nombre='"+nombre+"',peli_anno='";
    cadsql1+=direccion+"', peli_tipo="+zona+" WHERE id="+g_ocio.idLocal;
    MySQL_Util.Ej_ConsultaAccion(g_ocio.Conn, cadsql1);
    //para modificar las formas de pago, primero borro las que había
    String cadBorra="DELETE FROM participantes WHERE id_pelicula="+g_ocio.idLocal;
    MySQL_Util.Ej_ConsultaAccion(g_ocio.Conn, cadBorra);
    //Y a continuación meto las nuevas
    for (int i=0;i<formas_pago.length;i++){
            String insert2="INSERT INTO participantes ";
            insert2+=" VALUES("+g_ocio.idLocal+","+formas_pago[i]+")";
            MySQL_Util.Ej_ConsultaAccion(g_ocio.Conn, insert2);
        
        }
    return "index";
    }
}
