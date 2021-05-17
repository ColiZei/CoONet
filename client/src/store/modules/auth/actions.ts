import { ActionTree, ActionContext } from "vuex";

import { RootState } from "@/store/state";
import { AuthState } from "./state";
import { Mutations } from "./mutations";
import { ActionTypes } from "./action-types";
import { MutationTypes } from "./mutation-types";

import jwtDecode from "jwt-decode";
import { ApiJwtPayload } from "@/types/token";

const tokenUrl: string = process.env.VUE_APP_TOKEN_URL;
let timer: number;

type AugmentedActionContext = {
  commit<K extends keyof Mutations>(
    key: K,
    payload: Parameters<Mutations[K]>[1]
  ): ReturnType<Mutations[K]>;
} & Omit<ActionContext<AuthState, RootState>, "commit">;

export interface Actions {
  [ActionTypes.LOGOUT]({ commit }: AugmentedActionContext): void;

  [ActionTypes.LOGIN](
    { commit }: AugmentedActionContext,
    payload: { email: string; password: string }
  ): void;

  [ActionTypes.AUTOLOGIN]({ commit }: AugmentedActionContext): void;
  [ActionTypes.AUTOLOGOUT]({ commit }: AugmentedActionContext): void;
}

export const actions: ActionTree<AuthState, RootState> & Actions = {
  [ActionTypes.LOGOUT]({ commit }) {
    localStorage.removeItem("token");
    localStorage.removeItem("tokenExpiration");

    clearTimeout(timer);

    commit(MutationTypes.SET_USER, {
      token: "",
      user: {},
      didAutoLogout: false,
    });
  },

  async [ActionTypes.LOGIN]({ commit, dispatch }, { email, password }) {
    const res = await fetch(`${tokenUrl}/authentication_token`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email: email,
        password: password,
      }),
    });

    const resData = await res.json();

    if (!res.ok) {
      const error = new Error("Failed to authenticate");
      throw error;
    }

    const token = resData.token;
    const tokenDecoded = jwtDecode<ApiJwtPayload>(token);

    const expiresIn = tokenDecoded.exp * 1000;
    const expirationDate: any = new Date().getTime() + expiresIn;

    localStorage.setItem("token", token);
    localStorage.setItem("tokenExpiration", expirationDate);

    timer = setTimeout(() => {
      dispatch(ActionTypes.AUTOLOGOUT);
    }, expiresIn);

    commit(MutationTypes.SET_USER, {
      token,
      user: {
        username: tokenDecoded.username,
        roles: tokenDecoded.roles,
      },
      didAutoLogout: false,
    });
  },

  [ActionTypes.AUTOLOGIN]({ commit, dispatch }) {
    const token = localStorage.getItem("token") || "";

    const tokenExpiration: any = localStorage.getItem("tokenExpiration");
    const expiresIn: any = +tokenExpiration - new Date().getTime();

    if (expiresIn < 0) {
      return;
    }

    timer = setTimeout(() => {
      dispatch(ActionTypes.AUTOLOGOUT);
    }, expiresIn);

    if (token !== "") {
      const tokenDecoded = jwtDecode<ApiJwtPayload>(token);

      commit(MutationTypes.SET_USER, {
        token,
        user: {
          username: tokenDecoded.username,
          roles: tokenDecoded.roles,
        },
        didAutoLogout: false,
      });
    }
  },
  [ActionTypes.AUTOLOGOUT]({ commit, dispatch }) {
    dispatch(ActionTypes.LOGOUT);
    commit(MutationTypes.SET_DIDAUTOLOGOUT, true);
  },
};
