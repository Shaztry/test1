import java.util.Scanner;
public class array_ds{
    public static void reverse(int[] arr){
        try{
            for(int i = arr.length - 1; i >= 0; i--){
                System.out.print(arr[i] + " ");
                if(i==0) break;
            }
        } catch(ArrayIndexOutOfBoundsException e){
            System.out.print(e);
        }
    }
    public static void main(String args[]){
        Scanner in = new Scanner(System.in);
        array_ds ads = new array_ds();
        int arrSize = in.nextInt();
        int[] arr = new int[arrSize];
        for(int i = 0; i < arrSize; i++){
            arr[i] = in.nextInt();
        }
        ads.reverse(arr);
    }
}