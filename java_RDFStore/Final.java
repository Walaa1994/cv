/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import static org.apache.jena.assembler.JA.Model;
import org.apache.jena.query.Dataset;
import org.apache.jena.query.Query;
import org.apache.jena.query.QueryExecution;
import org.apache.jena.query.QueryExecutionFactory;
import org.apache.jena.query.QueryFactory;
import org.apache.jena.query.ResultSet;
import org.apache.jena.query.ResultSetFormatter;
import org.apache.jena.rdf.model.Model;
import org.apache.jena.rdf.model.ModelFactory;
import org.apache.jena.tdb.TDBFactory;
import org.apache.jena.util.FileManager;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;


public class Final {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        
   Final f=new Final();    
   f.store(args[0],args[1]);
  // f.query();
    
   
    }
	
	 public String readFile(String filename)
    {
        String content = null;
        File file = new File(filename); 
        FileReader reader = null;
        try {
            reader = new FileReader(file);
            char[] chars = new char[(int) file.length()];
            reader.read(chars);
            content = new String(chars);
            reader.close();
        } 
        catch (IOException e) {
            e.printStackTrace();
        } 
        finally {
            try{
                 if(reader !=null)
                {
                     reader.close();
               }
            }catch (IOException e) {
                  e.printStackTrace();
              }
        }
        return content;
    }
	
    public void store(String source , String filename ){
		
	String queryString = readFile(filename); 
    //locate the tdb
    String directory = "C:/tdb ";
   
    
    Dataset dataset = openTDB(directory);
  // Model tdb1 = loadModel(source1, dataset);
  //  dataset.addNamedModel("rdfstorage", tdb1);
    
    Model tdb = loadModel(source, dataset);
    dataset.addNamedModel("rdfstorage", tdb);
   /* String queryString = "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  \n" +
		"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>\n" +
		"PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> \n" +
		"PREFIX vcard: <http://www.w3.org/2001/vcard-rdf/3.0#>\n" +
		"PREFIX foaf: <http://xmlns.com/foaf/0.1/>\n" +
		"select ?FirstName  \n" +
		"where {\n" +
		"  ?resume cv:hasSkill ?q .   \n" +
		"  ?q cv:skillName \"java\". \n" +
		"  ?resume cv:hasEducation ?w .   \n" +
		"  ?w cv:eduMinor \"Software Engineering\".\n" +
		"  ?w cv:degreeType <http://rdfs.org/resume-rdf/base.rdfs#EduBachelor>.\n" +
		"  ?resume cv:aboutPerson ?person.  \n" +
		"  ?person foaf:firstName ?FirstName .\n" +
		"}   ";*/

   Query query = QueryFactory.create(queryString);

   QueryExecution qe = QueryExecutionFactory.create(query, tdb);
   ResultSet results = qe.execSelect();

   ResultSetFormatter.out(System.out, results, query);

   qe.close();
    
    

    

    //tdb1.close();
    tdb.close();
   
    dataset.close();
}
  /* public void query(){
    String directory = "C:/tdb ";
   Dataset dataset = TDBFactory.createDataset(directory);
   Model tdb = dataset.getDefaultModel();
   String source = "D:/RDF/rdfstorage.rdf";
   FileManager.get().readModel( tdb, source, "RDF/XML" );
   String queryString = "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>\n" +
"PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> \n" +
"PREFIX vcard: <http://www.w3.org/2001/vcard-rdf/3.0#>\n" +
"PREFIX foaf: <http://xmlns.com/foaf/0.1/>\n" +
"select ?FirstName ?LastName ?Birthday ?Gender ?Nationality ?MaritalStatus ?Phone ?Email\n" +
"where {\n" +
"  ?resume cv:hasSkill ?q .   \n" +
"  ?q cv:skillName \"java\". \n" +
"  ?resume cv:hasEducation ?w .   \n" +
"  ?w cv:eduMinor \"Software Engineering\".\n" +
"  ?w cv:degreeType <http://rdfs.org/resume-rdf/base.rdfs#EduBachelor>.\n" +
"  ?resume cv:aboutPerson ?person.  \n" +
"  ?person foaf:firstName ?FirstName .\n" +
"  ?person foaf:lastName  ?LastName .\n" +
"  ?person foaf:birthday  ?Birthday .\n" +
"  ?person cv:gender ?Gender .\n" +
"  ?person cv:hasNationality ?Nationality .\n" +
"  ?person cv:maritalStatus ?MaritalStatus .\n" +
"  ?person foaf:phone ?Phone .\n" +
"  ?person foaf:mbox ?Email .\n" +
"  #?person vcard:hasAddress ?c .\n" +
"  #?c vcard:locality ?Country .\n" +
"}   ";

   Query query = QueryFactory.create(queryString);

   QueryExecution qe = QueryExecutionFactory.create(query, tdb);
   ResultSet results = qe.execSelect();

   ResultSetFormatter.out(System.out, results, query);

   qe.close();
   }
*/



public Dataset openTDB(String directory){
    // open TDB dataset
    //create the tdb
    Dataset dataset = TDBFactory.createDataset(directory);
    return dataset;
}


public Model loadModel(String source, Dataset dataset){
//create the model for rdf file
    Model tdb = ModelFactory.createDefaultModel();
    FileManager.get().readModel( tdb, source, "RDF/XML" );
    return tdb;
}
    }
    

