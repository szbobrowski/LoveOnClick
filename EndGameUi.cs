using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class EndGameUi : MonoBehaviour {
    public Text label;
    public static EndGameUi instance;

    void Awake() {
        instance = this;
    }

    public static void ShowTextAndQuit(string message) {
        instance.StartCoroutine(ShowTextAneQuitCoroutine(message));
    }

    static IEnumerator ShowTextAneQuitCoroutine(string message) {
        yield return new WaitForSeconds(0.3f);
        ShowLabel(message);
        yield return new WaitForSeconds(0.5f);
        Stop();
    }

    static void ShowLabel(string message) {
        instance.label.text = message;
        instance.label.gameObject.SetActive(true);
    }

    static void Stop() {
        #if UNITY_EDITOR
        UnityEditor.EditorApplication.isPlaying = false;
        #endif
        Debug.Log("Level complete, stopping playmode\n");
    }
}
