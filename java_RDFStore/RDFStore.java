
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
import org.apache.jena.tdb.TDBFactory;
import org.apache.jena.util.FileManager;


public class RDFStore {

    public static void main(String[] args) {
     
     RDFStore f=new RDFStore(); 
     f.ModelStore(args[0],args[1]);
    }


public Dataset openTDB(String directory){
    // open TDB dataset
    //create the tdb
    Dataset dataset = TDBFactory.createDataset(directory);
    return dataset;
}

public void ModelStore(String source, String dataset_path){
    Dataset dataset = openTDB(dataset_path);
    Model defaultModel = dataset.getDefaultModel();
    FileManager.get().readModel( defaultModel, source, "RDF/XML" );
    defaultModel.close();
    dataset.close();
}

}