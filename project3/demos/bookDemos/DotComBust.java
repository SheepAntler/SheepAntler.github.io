import java.util.*;

public class DotComBust {
    // Declare and intialize the variables we'll need
    private GameHelper helper = new GameHelper();
    private ArrayList<DotCom> dotComsList = new ArrayList<DotCom>();
    private int numberOfGuesses = 0;

    // make 3 DotCom objects, give them names, and stick them in the ArrayList
    private void setUpGame() {
        // first make some DotComs and give them locations
        DotCom one = new DotCom();
        one.setName("Destroyer");
        DotCom two = new DotCom();
        two.setName("Carrier");
        DotCom three = new DotCom();
        three.setName("Battleship");
        // now, add them to the ArrayList
        dotComsList.add(one);
        dotComsList.add(two);
        dotComsList.add(three);
        // print brief instructions for the user
        System.out.println("Your goal is to sink three ships:");
        System.out.println("Destroyer, Carrier, and Battleship");
        System.out.println("Try to sink them all in the fewest number of guesses.");
        // repeat with each ship in the list
        for (DotCom dotComToSet : dotComsList) {
            // as the helper for a ship location
            ArrayList<String> newLocation = helper.placeDotCom(3);
            // call the setter method on this ship to give it the location you just got from the helper
            dotComToSet.setLocationCells(newLocation);
        } // close for loop
    } // close set up game method

    private void startPlaying() {
        // as long as the dotComesList is NOT empty
        while(!dotComsList.isEmpty()) {
            // get user input
            String userGuess = helper.getUserInput("Enter a guess...");
            // call our own checkUserGuess method
            checkUserGuess(userGuess);
        } // close while
        finishGame();
    } // close start playing method

    private void checkUserGuess(String userGuess) {
        // increment the number of guesses the user has made
        numberOfGuesses++;
        // assume it's a miss, unless told otherwise
        String result = "miss";
        // repeat with all ships in the list
        for (DotCom dotComToTest : dotComsList) {
            // ask the DotCom to check th user guess, looking for a hit or kill
            result = dotComToTest.checkYourself(userGuess);
            if (result.equals("hit")) {
                // get out of the loop early; no point in testing the others
                break;
            }
            if (result.equals("kill")) {
                // the ship is dead; remove it from the DotComs list then get out of the loop
                dotComsList.remove(dotComToTest);
                break;
            }
        } // close for
        // Print the result for the user
        System.out.println(result);
    } // close method

    private void finishGame() {
        // Print a message telling the user how they did in the game
        System.out.println("All ships are at the bottom of the ocean!");
        if (numberOfGuesses <= 18) {
            System.out.println("It only took you " + numberOfGuesses + " guesses.");
            System.out.println("You got out before all your ships sank.");
        } else {
            System.out.println("Took you long enough! " + numberOfGuesses + " guesses?!?!?");
            System.out.println("Now you're sleeping with the fishes.");
        }
    } // close method

    public static void main(String[] args) {
        // create the game object
        DotComBust newGame = new DotComBust();
        // tell the game object to set up a game
        newGame.setUpGame();
        // tell the game object to start the main gameplay loop
        newGame.startPlaying();
    } // close method
} // close class
