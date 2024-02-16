
package advancedoslab;

import java.awt.Desktop;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.InputStreamReader;
import javax.swing.JFileChooser;
import javax.swing.JOptionPane;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.OutputStream;
import static java.lang.System.load;
import java.net.URI;
import java.sql.*;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import static java.util.ServiceLoader.load;


public class Page1 extends javax.swing.JFrame {

    /**
     * Creates new form Page1
     */
    public Page1() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jButton3 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();
        jButton5 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new java.awt.GridLayout(5, 1));

        jButton1.setText("Split file into parts");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton1);

        jButton2.setText("Enrypt the file & Upload");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton2);

        jButton3.setText("Download a file");
        jButton3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton3ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton3);

        jButton4.setText("Decrypt a file");
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton4);

        jButton5.setText("Update a file");
        jButton5.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton5ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton5);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        // Slect file
            File fin = null;
            String fnm=null;
            String nnm=null;
            JFileChooser fc=new JFileChooser();
            int rv=fc.showOpenDialog(fc);
            if (rv==JFileChooser.APPROVE_OPTION)
                {
                    try
                        {
                            fin=fc.getSelectedFile();
                            fnm=(String)fin.getName();
                            System.out.println("File Name:  "+fnm);
                        }
                    catch(Exception e)
                        {
                          
                        }
                }
            // Enter number of parts
             String input = JOptionPane.showInputDialog("Enter number of parts:");
             int n=Integer.parseInt(input);
             System.out.println("nop");
             System.out.println(n);
             //count lines
             int nol=0;
             try
             {
             FileInputStream fis = new FileInputStream(fin);
             BufferedReader br = new BufferedReader(new InputStreamReader(fis));
             String line = null;
             while ((line = br.readLine()) != null) 
                {
                   nol++;
                }
             fis.close();
             br.close();
             }
             catch(Exception e)
                     {
                     }
             //lines per part
             int lpp=0;
             lpp=nol/n;
             //creating parts
             try
             {
             FileInputStream fis = new FileInputStream(fin);
             BufferedReader br = new BufferedReader(new InputStreamReader(fis));
             String line = null;
             //rename
             int lastPeriodPos = fnm.lastIndexOf('.');
             nnm=fnm.substring(0, lastPeriodPos);
             System.out.println("File name is :"+nnm);
             //destination
             File dir = new File(".");
             int fnum=1;
             int coun=1;
             String dest = dir.getCanonicalPath() + File.separator + nnm+fnum+".txt";
             FileWriter fstream = new FileWriter(dest, true);
             BufferedWriter out = new BufferedWriter(fstream);
             //Database entry of first file
             try
                         {
                            Calendar cal = Calendar.getInstance();
                            SimpleDateFormat sdf = new SimpleDateFormat("HH:mm:ss");
                            System.out.println( sdf.format(cal.getTime()) );
                            String time=""+sdf.format(cal.getTime());
                            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
                            Connection con=DriverManager.getConnection("jdbc:odbc:db");
                            String query="insert into clienttab values(?,?,?,?)";
                            PreparedStatement st=con.prepareStatement(query);
                            st.setString(1,nnm+fnum+".txt");
                            st.setString(2,time);
                            st.setString(3,"1");
                            st.setString(4,time);
                            st.executeUpdate();
                         }
                         catch(Exception e){System.out.println(e.getMessage());}
             
             while ((line = br.readLine()) != null) 
                {
                     if(coun<=lpp)
                     {
                         coun++;
                         out.write(line);
                        out.newLine();
                     }
                     else
                     {
                         out.close();
                         fnum++;
                         dest = dir.getCanonicalPath() + File.separator + nnm+fnum+".txt";
                         fstream = new FileWriter(dest, true);
                         out = new BufferedWriter(fstream);
                         coun=1;
                         //Database entry
                         try
                         {
                            Calendar cal = Calendar.getInstance();
                            SimpleDateFormat sdf = new SimpleDateFormat("HH:mm:ss");
                            System.out.println( sdf.format(cal.getTime()) );
                            String time=""+sdf.format(cal.getTime());
                            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
                            Connection con=DriverManager.getConnection("jdbc:odbc:db");
                            String query="insert into clienttab values(?,?,?,?)";
                            PreparedStatement st=con.prepareStatement(query);
                            st.setString(1,nnm+fnum+".txt");
                            st.setString(2,time);
                            st.setString(3,"1");
                            st.setString(4,time);
                            st.executeUpdate();
                         }
                         catch(Exception e){System.out.println(e.getMessage());}
                     }
                     
            	}
             br.close();
             out.close();
             }
             catch(Exception e){}
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed

        File fin = null;
        String fnm=null;
        String nnm=null;                
        JFileChooser fc=new JFileChooser();
        int rv=fc.showOpenDialog(fc);
        if (rv==JFileChooser.APPROVE_OPTION)
            {
                try
                   {
                        fin=fc.getSelectedFile();
                        fnm=(String)fin.getName();
                      
                    }
                catch(Exception e)
                        {
                        }
            }
        //ask for key to upload
        String input = JOptionPane.showInputDialog("Enter a key to encrypt:");
        int key=Integer.parseInt(input);
         //rename
         int lastPeriodPos = fnm.lastIndexOf('.');
         nnm=fnm.substring(0, lastPeriodPos);
         try
             {
            // file to be encrypted
            FileInputStream inFile = new FileInputStream(fin);
            // encrypted file
            File dir = new File(".");
            String dest = dir.getCanonicalPath() + File.separator + nnm;
            FileOutputStream outFile = new FileOutputStream(dest);
            
            //code
            int i=0;
            int k=0,j=0,pt=1;
            while((i=inFile.read())!=-1)
                    {
                                    outFile.write(i+key);
                    }
            inFile.close();
            outFile.close();
            System.out.println("ENCRYPTED");
            
             }
         
         catch(Exception e){}
         //server database values transfer
         System.out.println("Upload file name as: "+nnm);
         String v1="",v2="",v3="",v4="";
         try
         {
             String newfn=nnm+".txt";
             Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
             Connection con=DriverManager.getConnection("jdbc:odbc:db");
             Statement st=con.createStatement();
             ResultSet rs=st.executeQuery("Select * from clienttab");
             while(rs.next())
             {
                 String cfn=rs.getString(1);
                 if(cfn.equals(newfn))
                 {
                     System.out.println("The name of file="+cfn);
                      v1=cfn;
                      v2=rs.getString(2);
                     v3=rs.getString(3);
                     v4=rs.getString(4);
                     
                 }
             }
         }
         catch(Exception e){}
                    
         
         try
            {
              String url ="http://192.168.3.76/pj/index.php?val1="+v1+"&val2="+v2+"&val3="+v3+"&val4="+v4;
              Desktop dt = Desktop.getDesktop();
              URI uri = new URI(url);
              dt.browse(uri.resolve(uri));
            }
    catch(Exception e){}
      
        
    }//GEN-LAST:event_jButton2ActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton3ActionPerformed
        // TODO add your handling code here:
            try
            {
              String url ="http://192.168.3.76/pj/d1.php";
              Desktop dt = Desktop.getDesktop();
              URI uri = new URI(url);
              dt.browse(uri.resolve(uri));
            }
    catch(Exception e){}
     
    }//GEN-LAST:event_jButton3ActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
        // TODO add your handling code here:
        
        File fin = null;
        String fnm=null;
        String nnm=null;                
        JFileChooser fc=new JFileChooser();
        int rv=fc.showOpenDialog(fc);
        if (rv==JFileChooser.APPROVE_OPTION)
            {
                try
                   {
                        fin=fc.getSelectedFile();
                        fnm=(String)fin.getName();
                      //  System.out.println("File Name:  "+fnm);
                    }
                catch(Exception e)
                        {
                        }
            }
        //ask for key to decrypt
        String input = JOptionPane.showInputDialog("Enter key to decrypt:");
        int key=Integer.parseInt(input);
        //
        fnm=fnm+".txt";
        //rename
         int lastPeriodPos = fnm.lastIndexOf('.');
         nnm=fnm.substring(0, lastPeriodPos);
         try
             {
            // file to be encrypted
            FileInputStream inFile = new FileInputStream(fin);
            // encrypted file
            File dir = new File(".");
            String dest = dir.getCanonicalPath() + File.separator +"\\decrypted\\"+ nnm+".txt";
            FileOutputStream outFile = new FileOutputStream(dest);
            
            //code
            int i=0;
            int k=0,j=0,pt=1;
            while((i=inFile.read())!=-1)
                    {
                                    outFile.write(i-key);
                    }
            inFile.close();
            outFile.close();
            System.out.println("DECRYPTED");
            
             }
         
         catch(Exception e){}

    }//GEN-LAST:event_jButton4ActionPerformed

    private void jButton5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton5ActionPerformed
        // TODO add your handling code here:
            File fin=null;
            String fnm="";
            JFileChooser fc=new JFileChooser();
            int rv=fc.showOpenDialog(fc);
            if (rv==JFileChooser.APPROVE_OPTION)
                {
                    try
                        {
                            fin=fc.getSelectedFile();
                            fnm=(String)fin.getName();
                            System.out.println("File Name:  "+fnm);
                        }
                    catch(Exception e)
                        {
                          
                        }
                }
            try
                {
                    String ptp="D:\\Computer Languages Programs\\Advanced Operating System Lab\\Assignment3\\AdvancedOSLab\\"+fnm;
                    Process p = Runtime.getRuntime().exec("notepad "+ptp);
                    Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
                    Connection con=DriverManager.getConnection("jdbc:odbc:db");
                    Statement st=con.createStatement();
                    ResultSet rs=st.executeQuery("Select * from clienttab");
                    while(rs.next())
                        {
                            String col1=rs.getString(1);
                            
                            if(fnm.equals(col1))
                            {
                                String col3=rs.getString(3);
                                int ncol3=Integer.parseInt(col3);
                                ncol3++;
                                String vcol=""+ncol3;
                                try
                                {   //update version
                                     Calendar cal = Calendar.getInstance();
                                     SimpleDateFormat sdf = new SimpleDateFormat("HH:mm:ss");
                                     System.out.println( sdf.format(cal.getTime()) );
                                     String time=""+sdf.format(cal.getTime());
                                     Connection con1=DriverManager.getConnection("jdbc:odbc:db");
                                     Statement st1=con1.createStatement();
                                     String queryn ="update clienttab set lat='"+time+"', version='"+vcol+"' where fname='"+fnm+"'";
                                     st1.executeUpdate(queryn);
                                }
                                catch(Exception e){}
                                
                            }
                            else
                                System.out.println("Error entry");
                        }
                }
            catch(Exception e){}     
    }//GEN-LAST:event_jButton5ActionPerformed

    public static void main(String args[]) {
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Page1.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Page1.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Page1.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Page1.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        

        
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Page1().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton3;
    private javax.swing.JButton jButton4;
    private javax.swing.JButton jButton5;
    // End of variables declaration//GEN-END:variables
}
