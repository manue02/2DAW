import java.sql.*;
import java.util.ArrayList;
import java.util.Map;
import javafx.event.ActionEvent;
import javax.faces.component.html.HtmlDataTable;
public class g_ocio {

    public static Connection Conn;
    private ResultSet rsOcio;
    private ResultSet rsFPago;
     private HtmlDataTable tabla;
    private String comprobar;
    public static String idLocal;
 //para las búsquedas
    String sConsulta="select * from vista_peliculas";
    String sWhere=" WHERE true";
    String sOrden=" ORDER BY id";
    private String snombre_Busc;
    private String szona_Busc;
    private String[] sfpago_Busc;
    private String sdireccion_Busc;
    ///resultado de la búsqueda
    private String sinfo_Sel;
    
    public g_ocio() {
        Conn=MySQL_Util.Conectar("localhost", "root", "", "tipo2");
    }

    /**
     * @return the rsOcio
     */
    public ResultSet getRsOcio() {
        String cadenaSql=sConsulta+sWhere+sOrden;
        rsOcio=MySQL_Util.Sel_Consulta(Conn, cadenaSql);
        return rsOcio;
    }
    public String seleccionLista_Del(){
        String sId_borrar=ObtenerID();
        
    //Borrar en la tabla locales_formas_pago
    String borrarHijos="DELETE FROM participantes";
    borrarHijos+=" WHERE id_pelicula="+sId_borrar;
    MySQL_Util.Ej_ConsultaAccion(Conn, borrarHijos);
    //borrar en la tabla locales
    String borrarPadre="DELETE FROM peliculas WHERE id="+sId_borrar;
    MySQL_Util.Ej_ConsultaAccion(Conn, borrarPadre);
    return "index";
    }
      public String obtenerDatosLocal(){
     idLocal=ObtenerID();   
    return "m_local";
    }
    public String nuevoLocal(){
        idLocal="";
        return "a_local";
    }
    public String ObtenerID(){
      Map <String,Object> fila;   
     fila= (Map <String,Object>)tabla.getRowData();
     String devuelve=fila.get("id").toString();
     return devuelve;
     
    }
    /**
     * @param rsOcio the rsOcio to set
     */
    public void setRsOcio(ResultSet rsOcio) {
        this.rsOcio = rsOcio;
    }

    /**
     * @return the rsFPago
     */
    public ResultSet getRsFPago() {
        String sqlPago;
        try{
        sqlPago="SELECT fp.NOMBRE FROM personas fp INNER JOIN participantes lfp ON fp.ID=lfp.id_persona ";
        sqlPago+=" WHERE lfp.ID_pelicula="+rsOcio.getString("ID") ;
        rsFPago=MySQL_Util.Sel_Consulta(Conn, sqlPago);
        }
        catch (SQLException ex){
            return null;
        }
        return rsFPago;
    }
    
     /**
     * @return the tabla
     */
    public HtmlDataTable getTabla() {
        return tabla;
    }

    /**
     * @param tabla the tabla to set
     */
    public void setTabla(HtmlDataTable tabla) {
        this.tabla = tabla;
    }

    /**
     * @return the comprobar
     */
    public String getComprobar() {
        return comprobar;
    }
    
    /**
     * @return the snombre_Busc
     */
    public String getSnombre_Busc() {
        return snombre_Busc;
    }

    /**
     * @param snombre_Busc the snombre_Busc to set
     */
    public void setSnombre_Busc(String snombre_Busc) {
        this.snombre_Busc = snombre_Busc;
    }

    /**
     * @return the szona_Busc
     */
    public String getSzona_Busc() {
        return szona_Busc;
    }

    /**
     * @param szona_Busc the szona_Busc to set
     */
    public void setSzona_Busc(String szona_Busc) {
        this.szona_Busc = szona_Busc;
    }

    /**
     * @return the sfpago_Busc
     */
    public String[] getSfpago_Busc() {
        return sfpago_Busc;
    }

    /**
     * @param sfpago_Busc the sfpago_Busc to set
     */
    public void setSfpago_Busc(String[] sfpago_Busc) {
        this.sfpago_Busc = sfpago_Busc;
    }

    /**
     * @return the sdireccion_Busc
     */
    public String getSdireccion_Busc() {
        return sdireccion_Busc;
    }

    /**
     * @param sdireccion_Busc the sdireccion_Busc to set
     */
    public void setSdireccion_Busc(String sdireccion_Busc) {
        this.sdireccion_Busc = sdireccion_Busc;
    }

    /**
     * @return the sinfo_Sel
     */
    public String getSinfo_Sel() {
        String sDevuelve= "Número de locales encontrados:";
        int numero=MySQL_Util.Numero_Registros(rsOcio);
        sinfo_Sel=sDevuelve+numero;
        return sinfo_Sel;
    }

    /**
     * @param sinfo_Sel the sinfo_Sel to set
     */
    public void setSinfo_Sel(String sinfo_Sel) {
        this.sinfo_Sel = sinfo_Sel;
    }
    public ArrayList getListaZonas(){
        String cadena="SELECT id,nombre FROM tipos order by nombre";
        String sPrimeraOpcion="Indiferente";
        return MySQL_Util.Llenar_Lista_Busquedas(g_ocio.Conn, cadena,sPrimeraOpcion);
    }
    public ArrayList getListaFPago(){
        String cadena="SELECT * FROM personas";
        return MySQL_Util.Llenar_Lista(g_ocio.Conn, cadena);
    }
    public void buscar_local(ActionEvent event){
        if (snombre_Busc.trim().length()>0){
            sWhere+=" AND nombre LIKE '%"+snombre_Busc+"%'";
        }
        if (sdireccion_Busc.trim().length()>0){
            sWhere+=" AND año LIKE '%"+sdireccion_Busc+"%'";
        }
        if (!szona_Busc.equals("-1")){
            sWhere+="  AND Id_Tipo="+szona_Busc;
        }
        if (sfpago_Busc.length>0)   {
            sWhere+=" AND id in (select id_pelicula FROM participantes where id_persona in"+MySQL_Util.implode(sfpago_Busc)+")";
        
        }
    }
    public void limpiar_buscar_local(ActionEvent event){
        snombre_Busc="";
        sdireccion_Busc="";
        szona_Busc="-1";
        sfpago_Busc=null;
        sWhere=" WHERE true";
    }
}
