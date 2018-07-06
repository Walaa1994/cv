import edu.stanford.nlp.pipeline.Annotation;
import edu.stanford.nlp.pipeline.StanfordCoreNLP;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.util.Properties;

public class CoreNlp {

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
    
    public void nlp(String filename) throws FileNotFoundException, IOException{
        String text=readFile(filename);
        // creates a StanfordCoreNLP object, with POS tagging, lemmatization, NER, parsing, and coreference resolution
        Properties props = new Properties();
        props.setProperty("annotators", "tokenize, ssplit, pos, lemma, ner");
        StanfordCoreNLP pipeline = new StanfordCoreNLP(props);

        // create an empty Annotation just with the given text
        Annotation document = new Annotation(text);

        // run all Annotators on this text
        pipeline.annotate(document);

        FileOutputStream os = new FileOutputStream(new File("C:\\Users\\Roula Arab\\Desktop\\nlp.xml"));
        pipeline.xmlPrint(document, os);
        
        /*List<CoreMap> sentences = document.get(CoreAnnotations.SentencesAnnotation.class);

        for (CoreMap sentence : sentences) {
            // traversing the words in the current sentence
            // a CoreLabel is a CoreMap with additional token-specific methods
            for (CoreLabel token : sentence.get(CoreAnnotations.TokensAnnotation.class)) {
                // this is the text of the token
                String word = token.get(CoreAnnotations.TextAnnotation.class);
                // this is the POS tag of the token
                String pos = token.get(CoreAnnotations.PartOfSpeechAnnotation.class);
                // this is the NER label of the token
                String ne = token.get(CoreAnnotations.NamedEntityTagAnnotation.class);

                System.out.println(String.format("Print: word: [%s] pos: [%s] ne: [%s]", word, pos, ne));
            }
        }*/
    }
    public static void main(String[] args) throws FileNotFoundException, IOException {
       CoreNlp ob=new CoreNlp();
       ob.nlp(args[0]);
       
        
    }
}
