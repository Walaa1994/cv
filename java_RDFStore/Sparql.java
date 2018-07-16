
import java.io.ByteArrayOutputStream;
import static org.apache.jena.assembler.JA.Model;
import org.apache.jena.query.Dataset;
import org.apache.jena.query.Query;
import org.apache.jena.query.QueryExecution;
import org.apache.jena.query.QueryExecutionFactory;
import org.apache.jena.query.QueryFactory;
import org.apache.jena.query.QuerySolution;
import org.apache.jena.query.ResultSet;
import org.apache.jena.query.ResultSetFormatter;
import org.apache.jena.rdf.model.Model;
import org.apache.jena.rdf.model.ModelFactory;
import org.apache.jena.rdf.model.Resource;
import org.apache.jena.tdb.TDBFactory;
import org.apache.jena.util.FileManager;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;


public class Sparql {

    public static void main(String[] args) throws FileNotFoundException, IOException {
     
     Sparql f=new Sparql(); 
     f.querySparql(args[0], args[1]);
  
    
   
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

public Dataset openTDB(String directory){
    // open TDB dataset
    //create the tdb
    Dataset dataset = TDBFactory.createDataset(directory);
    return dataset;
}

public void querySparql(String file_path , String dataset_path ) throws FileNotFoundException {
    Dataset dataset = openTDB(dataset_path);
    Model def = dataset.getDefaultModel();
    
    String queryString = readFile(file_path);
    Query query = QueryFactory.create(queryString);

    QueryExecution qe = QueryExecutionFactory.create(query, def);
    ResultSet results = qe.execSelect();
	FileOutputStream os = new FileOutputStream(new File("java_RDFStore\\ResultSparql.json"));
    ResultSetFormatter.outputAsJSON(os, results);
    //ResultSetFormatter.out(System.out, results, query);
   /*try{
   ResultSet results = qe.execSelect();
   while(results != null && results.hasNext()){
       QuerySolution querySolution=results.nextSolution();
       String name=querySolution.get("FirstName").toString();
      
   }
   }finally{
       qe.close();
   }*/

   
    qe.close();
    def.close();
    dataset.close();
}
    }
 