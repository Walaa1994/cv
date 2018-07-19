
import org.apache.jena.query.Dataset;
import org.apache.jena.query.Query;
import org.apache.jena.query.QueryExecution;
import org.apache.jena.query.QueryExecutionFactory;
import org.apache.jena.query.QueryFactory;
import org.apache.jena.query.ResultSet;
import org.apache.jena.query.ResultSetFormatter;
import org.apache.jena.rdf.model.Model;
import org.apache.jena.tdb.TDBFactory;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import org.apache.jena.update.UpdateAction;
import org.apache.jena.update.UpdateFactory;
import org.apache.jena.update.UpdateRequest;


public class UpdateSparql {

    public static void main(String[] args) throws FileNotFoundException, IOException { 
      
     UpdateSparql f=new UpdateSparql(); 
     f.updateSparql(args[0], args[1]);
   
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

public void updateSparql(String file_path , String dataset_path){
    Dataset dataset = openTDB(dataset_path);
    Model def = dataset.getDefaultModel();
    
    String queryString = readFile(file_path);
    UpdateRequest u = UpdateFactory.create(queryString);
    UpdateAction.execute(u, def);
    def.close();
    dataset.close();
   
}
    }
 